<?php
declare(strict_types=1);
namespace LFreeze\BuilderPattern;

use LFreeze\BuilderPattern\House;

final class Entry {

    public function run() {
        $house = House::builder('yamamoto')
            ->yane('藁葺き')
            ->zaishitsu('プラチナ')
            ->area('愛知か沖縄か北海道')
            ->chushajo(false)
            ->niwa('プールを作れるぐらいの広さ')
            ->build();

        print_r($house->getProperties());

    }
    
    public function test(string $value): void {
        echo $value;
    }

}
