<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>{{url('/')}}</loc>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{url('/')}}/about-us</loc>
        <priority>0.80</priority>
    </url>
    @foreach ($categories as $category)
    <url>
        <loc>{{url('/')}}/category/{{$category->slug}}</loc>
        <priority>0.80</priority>
    </url>
    @endforeach
    @foreach($products as $product)
        <url>
            <loc>{{url('/')}}/product/{{$product->product_slug}}</loc>
        <priority>0.80</priority>
        </url>
    @endforeach
    <url>
        <loc>{{url('/')}}/contact-us</loc>
        <priority>0.80</priority>
    </url>
</urlset> 