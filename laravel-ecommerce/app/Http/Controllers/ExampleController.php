<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller {
    public function axios(Request $request, $name = null) {

        dd($request);

        if($name == null){
            
            return view('axios', [
                'page' => 'Axios test',
                'name' => $name
            ]);
        }

        return response()->json([
            'page' => 'Axios test',
            'name' => $name
        ]);
    }

}

/*axios.put('/api/your-endpoint', {
    data: 'A frissített adat'
}).then(response => {
    console.log('Sikerült a PUT kérés:', response.data);
}).catch(error => {
    console.error('Hiba a PUT kérés során:', error);
});*/

//axios.put('https://httpbin.org/put', { hello: 'world' });
