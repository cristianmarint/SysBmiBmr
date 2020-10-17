<?php

namespace Database\Factories;

use App\Models\persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class personaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = persona::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
            $niveles_actividad = [
                'SEDENTARIO',
                'LIGERAMENTE ACTIVO',
                'MODERADAMENTE ACTIVO',
                'MUY ACTIVO',
                'EXTREMADAMENTE ACTIVO',
            ];
            
            $categorias = [
                'PESO BAJO',
                'SALUDABLE',
                'SOBREPESO',
                'OBESO',
            ];
            
            $generos = [
                'MASCULINO',
                'FEMENINO',
            ];

        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'fecha_nacimiento'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'genero'=>$generos[array_rand($generos)],
            'peso' => rand(5,200),
            'estatura' => rand(10,200),
            'nivel_actividad'=>$niveles_actividad[array_rand($niveles_actividad)],
            'bmi'=> rand(16,30),
            'bmi_categoria'=>$categorias[array_rand($categorias)],
            'calorias_diarias'=>rand(1200,1900),
            'bmr'=>rand(1500,4000),
        ];
    }
}
