<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Gallary;
use Livewire\Component;
use App\Models\Apartment;
use Livewire\WithFileUploads;
use App\Models\Apartmentdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class Apartments extends Component
{
    use WithFileUploads,WithPagination;
    public $user;
    public $apartmentImages;
    public $link;
    public $price;
    public $location;
    public $num_bedrooms;
    public $num_living_rooms;
    public $num_bathrooms;
    public $num_parking;
    public $num_floors;
    public $area;
    public $description;
    public $ratings;
    public $features;
    public $gallary=[];
    public $files=[];


    protected $rules = [
        'link' => 'required|url',
        'price' => 'required|numeric',
        'location' => 'required',
        'num_bedrooms' => 'required|integer',
        'num_living_rooms' => 'required|integer',
        'num_bathrooms' => 'required|integer',
        'num_parking' => 'nullable',
        'num_floors' => 'required|integer',
        'area' => 'required|integer',
        'description' => 'required',
        'ratings' => 'nullable|numeric|min:1',
        'features' => 'required',
        'files.*' => 'required',
    ];

    public function resetFields(){
        $this->link = '';
        $this->price = '';
        $this->location = '';
        $this->num_bedrooms = '';
        $this->num_living_rooms = '';
        $this->num_bathrooms = '';
        $this->num_parking = '';
        $this->num_floors = '';
        $this->area = '';
        $this->description = '';
        $this->ratings = '';
        $this->features = [];
        $this->gallary = [];
        $this->files=[];
    }


    public function PostApartments()
    {
        $Vaildator = $this->validate();
        $this->features = $this->SplitFeatures($this->features);
        if ($this->user) {
            $Apartment = new Apartment();
            $Apartment->fill([
                'user_id' => $this->user->id,
                'vrlink' => $this->link,
                'location' => $this->location,
                'status' => 'available',
                'dimensions' => $this->area,
                'descrption' => $this->description,
                'features' => $this->features,
            ]);
            $Apartment->save();

            // another method for save data
            // $Apartment->atributte = $this->attributes
            // $Apartment->featuers = $this->input('features', []);
            // saveing

            $ApartmentDetiles = new Apartmentdetails();
            $ApartmentDetiles->apartment_id = $Apartment->id;
            $ApartmentDetiles->monthprice = $this->price;
            $ApartmentDetiles->yearprice = $this->price * 12;
            $ApartmentDetiles->livingroom = $this->num_living_rooms;
            $ApartmentDetiles->bedroom = $this->num_bedrooms;
            $ApartmentDetiles->parking = $this->num_parking;
            $ApartmentDetiles->baths = $this->num_bathrooms;
            $ApartmentDetiles->floors = $this->num_floors;
            $ApartmentDetiles->erea = $this->area;
            $ApartmentDetiles->save();

            // $images = $this->files;
            // $images = $this->file('files');

            $images = $this->files;
            foreach ($images as $file) {
                $ImageName = rand(100000, 999999) . time() . $file->getClientOriginalName();
                $path = $file->storeAs('gallaryaprtments', $ImageName, 'WEVR');
                $this->gallary[] = env('APP_URL') . '/' . 'public' . '/' . $path;
            }
            $ApartmentGallary = new Gallary();
            $ApartmentGallary->apartment_id = $Apartment->id;
            $ApartmentGallary->image = $this->gallary;
            $ApartmentGallary->save();
        }

        if ($ApartmentGallary->save() && $ApartmentDetiles->save() && $Apartment->save()) {
            session()->flash('success',"Post added Successfully!!");
        }
        $this->resetFields();
        $this->dispatchBrowserEvent('close-modal',[]);

    }

    public function showImage($ApartmentId)
    {
        $ApartmentsUser = $this->user->Apartment;
        // Fetch the item from the database using the $itemId parameter
        foreach ($ApartmentsUser as $Apartment) {
            if ($Apartment->id == $ApartmentId) {

                $apartment = Gallary::where('apartment_id', $ApartmentId)->first();
                if ($apartment) {
                    $apartmentImages = $apartment->image;
                    $apartmentImages = array_map('stripslashes', $apartmentImages);
                    $this->apartmentImages = $apartmentImages;
                    break;
                } else {
                    return $this->apartmentImages = [];
                    break;
                }
            }
        }
        // dd($this->apartmentImages);

    }

    public function deleteApartment($ApartmentId)
    {
        $apartment = Apartment::findOrFail($ApartmentId);

        if ($apartment->user_id == $this->user->id) {

        // dd($apartment->gallary->image);
        // Storage::disk('gallaryaprtments')->delete();
        $apartment->delete();
        session()->flash('message', 'Apartment deleted successfully.');
        } else {
        session()->flash('message', 'You do not have permission to delete this apartment.');
        }
    }


    public function UpdateApartment($ApartmentId)
    {
        dd($ApartmentId);
    }


    public function mount()
    {
        $this->user = Auth::user();
    }


    protected function SplitFeatures($features)
    {
        return explode("/", $features);
    }

    public function render()
    {
        return view('livewire.dashboard.apartments', [
            "apartments" => $this->user->Apartment()->with('info')->simplePaginate(10)
        ]);
    }
}
