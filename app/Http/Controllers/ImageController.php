<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function generateImage(Request $request): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $requestData = $request->all();

        $img = Image::make(public_path('task_input.png'));

        $canvasWidth = 300;
        $canvasHeight = 300;

        $fileName = 'logo.' . $requestData['logo']->getClientOriginalExtension();
        $requestData['logo']->move(storage_path('app/public/images/'), $fileName);
        $appendLogoImg = Image::make(storage_path("/app/public/images/" . $fileName));
        $img->insert($appendLogoImg, "top-left", 60, 91);

        $product1FileName = 'product_1.' . $requestData['product_images'][0]->getClientOriginalExtension();
        $requestData['product_images'][0]->move(storage_path('app/public/images/'), $product1FileName);
        $appendProduct1Img = Image::make(storage_path("/app/public/images/" . $product1FileName));
        $appendProduct1Img->fit(300, 300);


        $product1ImgMask = Image::canvas($canvasWidth, $canvasHeight);
        $product1ImgMask->circle($canvasWidth, $canvasWidth/2, $canvasHeight/2, function ($draw) {
            $draw->background('#fff');
        });
        $appendProduct1Img->mask($product1ImgMask, false);
        $img->insert($appendProduct1Img, "", 1308, 1675);

        $product2FileName = 'product_2.' . $requestData['product_images'][1]->getClientOriginalExtension();
        $requestData['product_images'][1]->move(storage_path('app/public/images/'), $product2FileName);
        $appendProduct2Img = Image::make(storage_path("/app/public/images/" . $product2FileName));
        $appendProduct2Img->fit(300, 300);
        $product2ImgMask = Image::canvas($canvasWidth, $canvasHeight);
        $product2ImgMask->circle($canvasWidth, $canvasWidth/2, $canvasHeight/2, function ($draw) {
            $draw->background('#fff');
        });
        $appendProduct2Img->mask($product2ImgMask, false);
        $img->insert($appendProduct2Img, "", 1655, 1675);

        $img->text('+91-'.$requestData['mobile_number'], 1525, 205, function($font) {
            $font->file(public_path('roboto.ttf'));
            $font->size(50);
            $font->color('#000000');
        });

        $img->text(implode(' || ', $requestData['product_titles']), 106, 1810, function($font) {
            $font->file(public_path('roboto.ttf'));
            $font->size(40);
            $font->color('#ffffff');
        });

        $lines = explode("\n", wordwrap($requestData['address'], 60)); // break line after 120 characters

        $address_height = count($lines) == 1 ? 1940 : 1924;
        for ($i = 0; $i < count($lines); $i++) {
            $offset = $address_height + ($i * 50);

            $img->text($lines[$i], 153, $offset, function($font) {
                $font->file(public_path('roboto.ttf'));
                $font->size(30);
                $font->color('#000000');
            });
        }

        $img->save(storage_path("/app/public/task_output.png"));

        return Response::download(public_path('storage/task_output.png'), 'task_output_'.time().'.png');
    }
}
