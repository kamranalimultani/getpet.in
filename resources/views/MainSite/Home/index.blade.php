@extends('MainSite.index')
@section('content')
    @include('MainSite.Common.CatWithBanner',['cats',$cats])
    @include('MainSite.Common.RandomProductsSlider')
    @include('MainSite.Common.FeaturedProducts',['randomProducts',$randomProducts])
    @include('MainSite.Common.AdsBanner')
    @include('MainSite.Common.LatestProductThreeSlider')
    @include('MainSite.Common.FromTheblogs')
@endsection
