<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Klant;
use App\Order;
use Fpdf;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        //dit haalt alle artikelen van de database via de model Product
        $artikelen = Product::all();
        return view('bonsai.artikelen.index', compact('artikelen'));
    }



    public function detail($id)
    {
        //Vertoont de details van een product
        $artikel = Product::find($id);
        return view('bonsai.artikelen.detail', ['artikel' => $artikel]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect('/artikelen');
    }
    public function getRemoveToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect('/artikelen');
    }
    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return view('bonsai.artikelen.winkelwagen');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('bonsai.artikelen.winkelwagen', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function makeOrder(Request $request)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;


//        $dataSet[] = [
//            'klant' => 2,
//            'opmerking' => 'hi test 3',
//            'totaal_prijs' => $totalPrice
//        ];


        $getKlantId = DB::table('klant')->insertGetId(
            [
                'naam' => $request->input('name'),
                'achternaam' => $request->input('lastname'),
                'adres' => $request->input('address'),
                'postcode' => $request->input('postalcode'),
                'email' => $request->input('email'),
                'verzendwijze' => 'Verzenden na betaling',

            ]
        );

        $getId = DB::table('bestelling')->insertGetId(
            [
                'klant' => $getKlantId,
                'opmerking' => $request->input('oms'),
                'totaal_prijs' => $totalPrice
            ]
        );

        foreach($products as $product){

            $dataSet2[] = [
                'bestelling' => $getId,
                'artikel' => $product['item']['id'],
                'aantal' => $product['qty'],
                'prijs' => $product['price']
            ];

            $dataSetPdf[] = [
                'artikel' => $product['item']['artikel'],
                'omschrijving' => $product['item']['omschrijving'],
                'aantal' => $product['qty'],
                'prijs' => $product['item']['prijs'],
                'totaal_prijs' => $product['price']
            ];
        }

       // dd($dataSetPdf);
//        echo $totalPrice;


        DB::table('bestel_regel')->insert($dataSet2);

        $klant = Klant::where('email', $request->input('email'))->first();
        $bestelling = Order::where('klant', $getKlantId)->first();
//        dd($bestelling);
        $regel = DB::table('bestel_regel')->where('bestelling', $getId)->get();

        $longArrays =
        [
            $klant,
            $bestelling,
            $dataSetPdf



        ];


        Fpdf::AddPage();
        Fpdf::SetFont('Arial','B',50);

        Fpdf::SetXY(15, 20);
        Fpdf::Cell(30,10, "BonsaiShop");

        Fpdf::SetFont('Arial','',10);

        Fpdf::SetXY(15, 40);
        Fpdf::Cell(30,5, 'T.a.v. '.$longArrays[0]['naam'].' '.$longArrays[0]['achternaam']);
        Fpdf::Ln();

        Fpdf::SetXY(15, 45);
        Fpdf::Cell(40,5, $longArrays[0]['adres']);
        Fpdf::Ln();

        Fpdf::SetXY(15, 50);
        Fpdf::Cell(40,5, $longArrays[0]['postcode']);
        Fpdf::Ln();

        Fpdf::SetXY(15, 55);
        Fpdf::Cell(40,5, $longArrays[0]['email']);
        Fpdf::Ln();


        Fpdf::SetXY(150, 35);
        Fpdf::Cell(40, 5, 'panserweg 12');
        Fpdf::Ln();

        Fpdf::SetXY(150, 40);
        Fpdf::Cell(40, 5, 'NL 2142KK Rander');

        Fpdf::Ln();

        Fpdf::SetXY(150, 45);
        Fpdf::Cell(40, 5, 'Nederland');

        Fpdf::Ln();

        Fpdf::SetXY(150, 50);
        Fpdf::Cell(40, 5, 'Tel. 020-0000000');

        Fpdf::Ln();


        Fpdf::SetFont('Arial', 'B', 20);
        Fpdf::SetXY(90, 70);
        Fpdf::Cell(40, 5, 'Factuur Bonsai order');

        Fpdf::Ln();

        Fpdf::SetFont('Arial','',10);



        Fpdf::SetXY(15, 80);
        Fpdf::Cell(40,10, 'Product');

        Fpdf::SetXY(55, 80);
        Fpdf::Cell(40,10, 'Omschrijving');

        Fpdf::SetXY(135, 80);
        Fpdf::Cell(40,10, 'Prijs');

        Fpdf::SetXY(155, 80);
        Fpdf::Cell(40,10, 'Aantal');

        Fpdf::SetXY(180, 80);
        Fpdf::Cell(40,10, 'Totaal bedrag');
        Fpdf::Ln();


        foreach($products as $product2) {


            Fpdf::SetX(15);
            Fpdf::Cell(40, 5, $product2['item']['artikel']);

            Fpdf::SetX(55);
            Fpdf::Cell(40, 5, $product2['item']['omschrijving']);

            Fpdf::SetX(135);
//            $Qic = Session::has('cart') ? Session::get('cart')->totalQty : '';

                Fpdf::Cell(40, 5, chr(128) . ' ' . $product2['item']['prijs']);




            Fpdf::SetX(155);
            Fpdf::Cell(40, 5, $product2['qty']);

            Fpdf::SetX(180);

            Fpdf::Cell(40, 5, chr(128) . ' ' . $product2['price']);

            Fpdf::Ln();





            $item_totaal = $bestelling['totaal_prijs'];
            $item_btw = $bestelling['totaal_prijs']*0.21;
            $item_totaal_btw = $bestelling['totaal_prijs']*1.21;
        }
        Fpdf::Ln();

        Fpdf::setX(160);
        Fpdf::Cell(20,5, "Subtotaal: ");
        Fpdf::Cell(20,5, chr(128).' '.$item_totaal);
        Fpdf::Ln();

        Fpdf::setX(160);
        Fpdf::Cell(20,5, "21% BTW: ");
        Fpdf::Cell(20,5, chr(128).' '.round($item_btw, 2));
        Fpdf::Ln();

        Fpdf::setX(160);
        Fpdf::Cell(20,5, "Totaal: ");
        Fpdf::Cell(20,5, chr(128).' '.round($item_totaal_btw, 2));
        Fpdf::Ln();



        date_default_timezone_set("europe/amsterdam");
        $day = date("d-m-Y");
        $time = date("h-i-sa");
        Fpdf::Output('D', 'T.a.v. '.$longArrays[0]['naam'].' '.$longArrays[0]['achternaam'].", dag~".$day.", tijd~".$time.".pdf");



    }

    public function reset()
    {
        Session::flush();
        return redirect('/');
    }


}