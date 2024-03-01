<?php

use Afshin\Racecli\Entities\Player;
use Afshin\Racecli\Entities\Vehicle;
use Afshin\Racecli\Services\Cli;
use Afshin\Racecli\Services\File;
use Afshin\Racecli\Services\GameLogic;

/**
 * require composer autoloader file
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * first touch with user
 */
Cli::output('loading data...' . PHP_EOL);

/**
 * create an object of class for read file from storage
 * we can develop this class with other functionality, for example, convert json to excel or other organized data
 */
$file = new File();
$vehicles = $file->getFileContent('vehicles.json')->asJson()->getResult();
$vehiclesName = [];

/**
 * add to an array of vehicles each of json indexes
 */
foreach ($vehicles as $vehicle) {
    $vehiclesName[] = $vehicle->name;
}

Cli::output('insert distance (Km): ');
try {
    $distance = Cli::input();
} catch (Exception $e) {
    Cli::output('something went wrong...');
}
Cli::output('selected distance : ' . $distance);

/**
 * first player interface
 * we can use a facade pattern for better struct
 */
$playerOneSelectedCar = Cli::menu($vehiclesName, 0, 'first player select your car');
$playerOne = new Player(1);
$playerOneSelectedVehicle = new Vehicle($vehicles[$playerOneSelectedCar]);
$playerOne->setVehicle($playerOneSelectedVehicle);
Cli::output($playerOneSelectedVehicle->getName() . PHP_EOL);

/**
 * first player interface
 * we can use a facade pattern for better struct
 */
$playerTwoSelectedCar = Cli::menu($vehiclesName, 0, 'second player select your car');
$playerTow = new Player(2);
$playerTwoSelectedVehicle = new Vehicle($vehicles[$playerTwoSelectedCar]);
$playerTow->setVehicle($playerTwoSelectedVehicle);
Cli::output($playerTwoSelectedVehicle->getName() . PHP_EOL);

/**
 * find winner by GameLogin class result and show it as terminal output
 */
$gameResult = (new GameLogic($playerOne, $playerTow, $distance))
    ->findWinner()
    ->calcDistanceDurationForEachPlayerVehicle()
    ->result();

$gameResult['winner'] ?
    Cli::output('player ' . $gameResult['winner']->getId() . ' you are winner.' . PHP_EOL, 'green') :
    Cli::output('no winner' . PHP_EOL, 'yellow');

Cli::output("player one duration for $distance Km : " . $gameResult['first_player_duration'] .
    ' hour(s).' . PHP_EOL, 'blue');
Cli::output("player two duration for $distance Km : " . $gameResult['second_player_duration'] .
    ' hour(s).' . PHP_EOL, 'blue');



