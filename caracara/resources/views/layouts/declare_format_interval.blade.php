@php
    //Fonction nécéssaire pour calculer la différence entre deux dates
    function format_interval(DateInterval $interval) {
               $result = "";
               if ($interval->y) { $result .= $interval->format("%y années "); }
               if ($interval->m) { $result .= $interval->format("%m mois "); }
               if ($interval->d) { $result .= $interval->format("%d jours "); }
               if ($interval->h) { $result .= $interval->format("%h heures "); }
               if ($interval->i) { $result .= $interval->format("%i minutes "); }

               return $result;
           }
@endphp
