<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller {
    public function axios() {
        //return view('axios', [
        //    'name' => 'variable'
        //]);
        $name = request('name');
        echo $name;
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
