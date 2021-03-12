<?php

namespace App\Actions\Fortify;

use App\Models\Tableau;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
                $this->createTableauSaved($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }

    /**
     * Créer le tableau des posts sauvegardés
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTableauSaved(User $user)
    {
        Tableau::forceCreate([
            'nom' => "Publications sauvegardées de ".$user->name,
            'description' => "Vous pouvez reposter ici les publications que vous avez aimées, ou que vous souhaitez lire plus tard... Il est privé et vous seul y avez accès !",
            'prive' => 1,
            'user_id' => $user->id
        ]);
        
        $tableauSaved = DB::table('tableaux')->where('user_id', '=', $user->id)->first();

        $user->tableauSaved()->associate($tableauSaved->id);
        $user->save();
    }
}
