@php
    //Fonction nécéssaire pour calculer la différence entre deux dates
    function format_interval(DateInterval $interval) {
                $result = "";
                if ($interval->y) {
                    if($interval->y===1)
                        $result .= $interval->format("%y an ");
                    else
                        $result .= $interval->format("%y ans ");
                    return $result;
                }
                if ($interval->m) {
                    $result .= $interval->format("%m mois ");
                    return $result;
                }
                if ($interval->d) {
                    if($interval->d===1)
                        $result .= $interval->format("%d jour ");
                    else
                        $result .= $interval->format("%d jours ");
                    return $result;
                }
                if ($interval->h) {
                    if($interval->h===1)
                        $result .= $interval->format("%h heure ");
                    else
                        $result .= $interval->format("%h heures ");
                    return $result;
                }
                if ($interval->i) {
                    if($interval->i===1)
                        $result .= $interval->format("%i minute ");
                    else
                        $result .= $interval->format("%i minutes ");
                    return $result;
                }
                else {
                    $result = "moins d'une minute";
                    return $result;
                }
           }
@endphp
