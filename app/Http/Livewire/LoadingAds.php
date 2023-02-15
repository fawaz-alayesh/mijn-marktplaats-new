<?php

namespace App\Http\Livewire;
use App\Models\Advertenties;
use Livewire\Component;

class LoadingAds extends Component
{
    public $readyToLoad = false;

    public function loadAds()

    {

        sleep(1);
        $this->readyToLoad = true;

    }


    public function render()
    {
       
        return view('livewire.loading-ads', [

            'ads' => $this->readyToLoad

                ? $ads = Advertenties::get() 

                : [],

        ]);
    }
}
