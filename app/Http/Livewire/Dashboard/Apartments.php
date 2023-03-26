<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Gallary;
use Livewire\Component;
use App\Models\Apartment;
use Livewire\WithFileUploads;
use App\Models\Apartmentdetails;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Apartments extends Component
{
    use WithFileUploads,WithPagination;
    public $user;
    public $IDapartment;
    public $link;
    public $location;
    public $area;
    public $description;
    public $features;
    public $ratings;

    public $price;
    public $num_bedrooms;
    public $num_living_rooms;
    public $num_bathrooms;
    public $num_parking;
    public $num_floors;
    public $files=[];


    public $update_link;
    public $update_location;
    public $update_area;
    public $update_description;
    public $update_features;
    public $update_ratings;

    public $update_price;
    public $update_num_bedrooms;
    public $update_num_living_rooms;
    public $update_num_bathrooms;
    public $update_num_parking;
    public $update_num_floors;
    public $update_files=[];

    public $updateApartment = false;
    public $addApartment = false;
    public $update_apartmentImages;
    public $showImages;
    public $gallary=[];

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

    public function resetFields($action){
        if($action == 0)
        {
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
            $this->features = '';
            $this->gallary = [];
            $this->files=[];
        }else{
            $this->update_link = '';
            $this->update_price = '';
            $this->update_location = '';
            $this->update_num_bedrooms = '';
            $this->update_num_living_rooms = '';
            $this->update_num_bathrooms = '';
            $this->update_num_parking = '';
            $this->update_num_floors = '';
            $this->update_area = '';
            $this->update_description = '';
            $this->update_ratings = '';
            $this->update_features = '';
            $this->update_files=[];
            $this->gallary = [];
        }

    }

    public function addApartment()
    {
        $this->resetFields(0);
        $this->resetFields(1);
        $this->updateApartment = false;
        $this->addApartment = true;
        $this->dispatchBrowserEvent('open-modal');

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
                $this->gallary[] = env('APP_URL') . '/' . $path;
            }
            $ApartmentGallary = new Gallary();
            $ApartmentGallary->apartment_id = $Apartment->id;
            $ApartmentGallary->image = $this->gallary;
            $ApartmentGallary->save();
        }

        if ($ApartmentGallary->save() && $ApartmentDetiles->save() && $Apartment->save()) {
            session()->flash('success',"Post added Successfully!!");
        }
        $this->resetFields(0);
        $this->resetFields(1);
        $this->addApartment = false;
        $this->updateApartment = false;
        $this->dispatchBrowserEvent('close-modal');

    }

    public function showImage($ApartmentId)
    {
        $ApartmentsUser = $this->user->Apartment;
        // Fetch the item from the database using the $itemId parameter
        foreach ($ApartmentsUser as $Apartment) {
            if ($Apartment->id == $ApartmentId) {

                $apartment = Gallary::where('apartment_id', $ApartmentId)->first();
                // dd($apartment);
                if ($apartment) {
                    $this->showImages = $apartment->image;
                    break;
                } else {
                    return $this->showImages = [];
                    break;
                }
            }
        }
        // dd($this->showImages);
        $this->dispatchBrowserEvent('open-modal2');
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
        $Apartment = Apartment::find($ApartmentId);
        if($Apartment->user_id === $this->user->id )
        {
            $ApartmentUser = $Apartment->where('id',"$ApartmentId")->with('info')->with('gallary')->first();

            $this->setvalues($ApartmentUser);

            $this->updateApartment = true;
            $this->addApartment = false;
        }
        // $this->resetFields(0);
        $this->addApartment = false;
        $this->updateApartment = true;
        $this->dispatchBrowserEvent('open-modal1');
    }

    public function postUpdate($ApartmentId)
    {
        $this->validate([
            'update_link' => 'required|url',
            'update_price' => 'required|numeric',
            'update_location' => 'required',
            'update_num_bedrooms' => 'required|integer',
            'update_num_living_rooms' => 'required|integer',
            'update_num_bathrooms' => 'required|integer',
            'update_num_parking' => 'nullable',
            'update_num_floors' => 'required|integer',
            'update_area' => 'required|integer',
            'update_description' => 'required',
            'update_ratings' => 'nullable|numeric|min:1',
            'update_features' => 'required',
            'update_files.*' => 'required']);

        $this->update_features = $this->SplitFeatures($this->update_features);
        if ($this->user) {
            $Apartment = Apartment::find($ApartmentId);
            if($Apartment->user_id === $this->user->id )
                {
                    $images = $this->update_files;
                    foreach ($images as $file)
                    {
                        $ImageName = rand(100000, 999999) . time() . $file->getClientOriginalName();
                        $path = $file->storeAs('gallaryaprtments', $ImageName, 'WEVR');
                        $this->gallary[] = env('APP_URL') . '/' . $path;
                    }
                    $ApartmentUser = $Apartment->where('id',"$ApartmentId")->with('info')->with('gallary')->first();
                    $this->gallary = array_merge($ApartmentUser->gallary->image,$this->gallary);
                    $ApartmentUser->vrlink  = $this->update_link;
                    $ApartmentUser->location = $this->update_location ;
                    $ApartmentUser->descrption = $this->update_description;
                    $ApartmentUser->features = $this->update_features;
                    $ApartmentUser->rating = $this->update_ratings;
                    // ===========================================================
                    $ApartmentUser->info->monthprice = $this->update_price;
                    $ApartmentUser->info->yearprice = $this->update_price * 12;
                    $ApartmentUser->info->livingroom = $this->update_num_living_rooms ;
                    $ApartmentUser->info->bedroom = $this->update_num_bedrooms;
                    $ApartmentUser->info->parking = $this->update_num_parking;
                    $ApartmentUser->info->baths = $this->update_num_bathrooms;
                    $ApartmentUser->info->floors = $this->update_num_floors;
                    $ApartmentUser->info->erea = $this->update_area;
                    $ApartmentUser->gallary->image = $this->gallary;
                    if($ApartmentUser->save() && $ApartmentUser->gallary->save() && $ApartmentUser->info->save()){
                        $this->updateApartment = false;
                        $this->addApartment = false;
                        $this->resetFields(1);
                        $this->resetFields(0);
                        $this->dispatchBrowserEvent('close-modal1');
                    }
                }
        }
    }

    public function mount()
    {
        $this->user = Auth::user();
    }


    protected function SplitFeatures($features)
    {
        return explode("/", $features);
    }


    protected function setvalues($ApartmentUser)
    {
        $this->IDapartment = $ApartmentUser->id;
        $this->update_price = $ApartmentUser->info->monthprice;
        $this->update_num_bedrooms = $ApartmentUser->info->bedroom;
        $this->update_num_living_rooms = $ApartmentUser->info->livingroom;
        $this->update_num_bathrooms = $ApartmentUser->info->baths;
        $this->update_num_parking = $ApartmentUser->info->parking;
        $this->update_num_floors = $ApartmentUser->info->floors;
        $this->update_area = $ApartmentUser->info->erea;
        $this->update_description = $ApartmentUser->descrption;
        $this->update_link = $ApartmentUser->vrlink;
        $this->update_location = $ApartmentUser->location;
        $this->update_ratings = $ApartmentUser->rating;
        $this->update_features = implode($ApartmentUser->features);
        $this->update_apartmentImages = $ApartmentUser->gallary->image;
    }

    public function render()
    {
        return view('livewire.dashboard.apartments.apartments', [
            "apartments" => $this->user->Apartment()->with('info')->simplePaginate(10)
        ]);
    }
}
