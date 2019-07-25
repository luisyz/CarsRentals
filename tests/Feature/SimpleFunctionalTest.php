<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SimpleFunctionalTest extends TestCase
{
  use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testWelcomePageWorks()
    {
      $response =  $this->get('/');
      $response->assertStatus(200);
    }
    public function testOnlyAvailableCategoriesAreShown(){
      //arrange
      $sportCategory = \App\Category::create([
        'name' => 'sport',
        'capacity' => 5,
        'cost' => 130,
      ]);
      $deluxeCategory = \App\Category::create([
        'name' => 'deluxe',
        'capacity' => 2,
        'cost' => 250,
      ]);
      $location = \App\Location::create([
        'country'=> 'Mexico',
        'state' => 'CDMX',
        'branch' => 'Aeropuerto Internacional Benito Juarez',
        'rate' => 1.2,
        'is_airport' => 1,
      ]);
      $location->categories()->attach($sportsCategory);

      //act
      //enviar el primer formulario con datos validos
      $response = $this->call('get', '/cars/reservations/categories', [
        'pickup_location'=>$location->id,
        'pickup_date'=> '2019-09-01',
        'return_location'=>$location->id,
        'return_date'=> '2019-09-03',
      ]);

      //assert
      $response->assertStatus(200);
      $response->assertSee('sport');
      $response->assertDontSee('deluxe');
    }
}
