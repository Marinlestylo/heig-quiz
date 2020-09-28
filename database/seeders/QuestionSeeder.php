<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Keyword;
use App\Models\Question;
use App\Models\User;
use App\Models\Answer;

class QuestionSeeder extends Seeder
{
    public function run()
    {

        // 1
        $q1 = Question::create([
          'name' => 'Transformation binaire',
          'content' => 'Que vaut 7 en binaire ?',
          'answer' => ['pattern' => '/\b(0b?)0*111\b'],
          'options' => [
              'length' => 10
          ],
          'difficulty' => 'medium'
        ]);
        $q1->keywords()->attach(Keyword::where('name', 'binary')->get());

        // 2
        $q2 = Question::create([
            'name' => 'Transformation binaire',
            'content' => 'Que vaut `0x8` en binaire ?',
            'answer' => ["pattern" => "\b(0b?)0*1000\b"],
            'difficulty' => 'medium',
            'explanation' => "`8` exprimé en hexadécimal correspond à $2^4$ soit le quatrième bit du nombre à un."
        ]);
        $q2->keywords()->attach(Keyword::where('name', 'hexadecimal')->get());

        // 3
        $q3 = Question::create([
            'name' => 'Transformation binaire',
            'content' => 'Que vaut `0` en binaire ?',
            'answer' => ["pattern" => "\b(0b?)0*0\b"],
            'difficulty' => 'easy',
            'explanation' => ''
        ]);

        // 4
        $q4 = Question::create([
            'name' => 'Complément à deux',
            'type' => 'multiple-choice',
            'options' => [
                "multipleAnswers" => false
            ],
            'content' => "
Le complément à deux c'est...

## 1

Inverser tous les bits

## 2

Inverser tous les bits et ajouter 1

## 3

Inverser tous les bits et soustraire 1

## 4

Complémenter le nombre binaire pour avoir une somme de deux

## 5

Ajouter 1 puis inverer tous les bits
",
            'answer' => [2],
            'difficulty' => 'easy',
            'explanation' => ''
        ]);

        // 5. Exemple de question avec des choix possibles
        // @a,b,c@ pour les listes possibles et
        // @...@ pour les champs libres
        $q5 = Question::create([
            'name' => 'Shunting Yard',
            'type' => 'multiple-choice',
            'content' => "

Dans l'algorithme de Shunting-yard dont l'image suitante résume le principe, plusieurs structures de données sont utilisées.

`first` est utilisé en entrée et `second` est utilisé en sortie. Les données intermédiaires sont stoquées sur `third`.

![algorithm](https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Shunting_yard.svg/440px-Shunting_yard.svg.png)
",
            'answer' => json_encode(["Une file d'attente", "une file d'attente", "une pile"]),
            'options' => [
                'gaps' => [
                    'first' => [
                        'Une pile',
                        "Une file d'attente",
                    ],
                    'second' => [
                        "une pile",
                        "une file d'attente"
                    ],
                    'third' => [
                        "une pile",
                        "une file d'attente"
                    ]
                ]
            ],
            'difficulty' => 'insane',
            'explanation' => ""
        ]);


        $q6 = Question::create([
            'name' => 'Boucle',
            'content' => "Comment déclarer une variable nommée `i`, un entier 32-bits non signé égal à la valeur `42` ?",
            'answer' => [
                'pattern' => '\b(unsigned\s+int|uint32_t)\s+i\s*=\s*42\s*;?\b'
            ],
            'options' => [
                "lines" => 1,
                'chars' => 40
            ],
            'difficulty' => 'insane',
            'explanation' => ""
        ]);


        $q7 = Question::create([
            'name' => 'Philostrate',
            'type' => 'multiple-choice',
            'content' => "
Témoin de la chute de [Jérusalem](https://en.wikipedia.org/wiki/Jerusalem), **Philostrate** n’hésite pas à écrire
que :

>Ce peuple s’était dès longtemps insurgé non contre les Romains, mais contre l’humanité en général. Des hommes qui ont imaginé une vie insociable, qui ne partagent avec leurs semblables ni la table, ni les libations, ni les prières, ni les sacrifices, sont plus éloignés de nous que Suse ou Bactres ou que l’Inde plus reculée encore...

Quelle eut été la portée de son argument sur **Dion Cassius** ?

## 1
Dion Cassius chante avec René
## 2
Dion Cassius n'affiche aucune sérénité
## 3
Dion Cassius adhère pleinement
## 4
La quatrième proposition est certainement la bonne
",
            'answer' => [3, 4],
            'options' => ['multipleChoices' => true],
            'difficulty' => 'hard',
            'explanation' => 'Aucune idée de pourquoi... Cette question ne semble pas avoir de sens'
        ]);



        Question::create([
            'name' => 'Montage électronique',
            'type' => 'fill-in-the-gaps',
            'content' => "

Dans le circuit ci-dessous. On reconnaît qu'il s'agit d'un `circuit_type`. Les deux `semiconductors` d'entrée forme un `montage`. Les deux `semi2` de sortie forment un montage de type `sortie`

![circuit](https://en.wikipedia.org/wiki/Amplifier#/media/File:Amplifier_Circuit_Small.svg)

",
            'answer' => [
                "une paire différentielle",
                "transistors bipolaires",
                "amplificateur de signal",
                "push-pull"
            ],
            'options' => [
                'gaps' => [
                    'circuit_type' => [
                        'une paire croisée',
                        'un gain semi-relatif',
                        'une paire différentielle',
                        'une source de courant',
                    ],
                    'semiconductors' => [
                        'transistors à effet de champ',
                        'mosfets',
                        'transistors bipolaires',
                        'résistances',
                        'IGBT',
                    ],
                    'montage' => [
                        'amplificateur de signal',
                        'atténuateur de bruit',
                        'intégrateur',
                        'un étage de transconductance'
                    ],
                    'semi2' => [
                        'transistors bipolaires',
                        'transistors à effet de champ',
                        'mosfets',
                        'IGBT',
                        'résistances'
                    ],
                    'sortie' => [
                        'push-pull',
                        'différentiel',
                        'à collecteur ouvert',
                        'à descendance neutre',
                        'de Schottky'
                    ]
                ]
            ],
            'difficulty' => 'medium',
            'explanation' => 'Explication'
        ]);
    }
}
