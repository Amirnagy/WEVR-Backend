<?php

namespace App\Http\Controllers\API\Search;

use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class searchController extends Controller
{

    protected $type,$min_price,$max_price,$Livingroom,$baths,$bedroom,
    $operator,$operator1,$operator2,$operator3;

    private function apiResponse($status,$massage,$data)
    {
        $response = [
            'status' => $status,
            'massage' =>$massage,
            'data' => $data
        ];
        return response()->json(
            $response
        );
    }

    private function handelIamge($apartments)
    {
        $apartments = $apartments->map(function ($apartment) {
            $images = json_decode($apartment->image);
            $apartment->image = collect($images)->map(function ($image) {
                return env('APP_URL') .'/'. $image;
            });
            return $apartment;
        });
        return $apartments;
    }
    private function customizeRequest($request)
    {
        $this->min_price = $request->min_price ?? 100;
        $this->max_price = $request->max_price ?? 1000000000;

        $this->type = $request->type ?? 3;
        $this->operator = !$request->type ? '<=' : '=';

        $this->bedroom = $request->bedroom ?? 100;
        $this->operator1 = !$request->bedroom ? '<=' : '=';

        $this->baths = $request->baths ?? 100;
        $this->operator2 = !$request->baths ? '<' : '=';

        $this->Livingroom = $request->Livingroom ?? 100;
        $this->operator3 = !$request->Livingroom ? '<' : '=';

    }
    public function search(Request $request)
    {
        $this->customizeRequest($request);


        $apartments = Apartment::query()
        ->join('apartmentdetails', 'apartments.id', '=', 'apartmentdetails.apartment_id')

        // when method take two parameter frist=> boolean and second=> closure function
        ->when($this->type,
                function ($query) {
                    return $query->where('type' , $this->operator , $this->type);})

        ->when($this->min_price && $this->max_price,
                function ($query) {
                    return $query->whereBetween('yearprice', [$this->min_price, $this->max_price]);})

        ->when($this->bedroom,
                function ($query){
                    return $query->where('bedroom',$this->operator1, $this->bedroom);})

        ->when($this->baths,
                function ($query) {
                    return $query->where('baths',$this->operator2, $this->baths);})

        ->when($this->Livingroom,
                function ($query) {
                    return $query->where('livingroom',$this->operator3, $this->Livingroom);})

        ->join('gallaries', 'apartments.id', '=', 'gallaries.apartment_id')
        ->get();

        $this->handelIamge($apartments);



        if(count($apartments)>=1)
        {
            return $this->apiResponse(1,'sucess search',$apartments);
        }else{
            return $this->apiResponse(1,'no apartment found',0);
        }
    }

    public function searchBystatment(Request $request)
    {
        $tokens = str_word_count(strtolower($request->string), 1);

        $results = DB::table('apartments')
            ->where(function($query) use ($tokens) {
                foreach ($tokens as $token) {
                    $query->orWhere('location', 'like', '%' . $token . '%');
                }
            })
            ->join('apartmentdetails', 'apartments.id', '=', 'apartmentdetails.apartment_id')
            ->join('gallaries', 'apartments.id', '=', 'gallaries.apartment_id')
            ->get();

            $this->handelIamge($results);

        if(count($results)>=1)
        {
            return $this->apiResponse(1,'successfully search',$results);
        }
        else {
            return $this->apiResponse(1,'not found',0);
        }
    }

}
