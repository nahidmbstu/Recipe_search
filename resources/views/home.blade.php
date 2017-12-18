@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div > 

<h3>your favorite recipe</h3>
	
</div>


<?php

foreach ( $status as $item) {
    echo $item->item_name;
    echo "<br/>";
}

?>

    </div>
</div>
@endsection
