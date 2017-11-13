@extends('layouts.master')

@section('content')

    <div class="container">


        <div id="map">

        </div>

        <br>

        {!! Form::open(['url' => '/getLocationCoords' , 'id' => 'searchGirls']) !!}

        {!! Form::label('district' , 'District') !!}

       {!! Form::select('district', $districts , null ,['id'=>'district']) !!}

    {{--  <select style="width: 130px" name="location" id="locationSelect"></select>   --}}

     <div id="city">

     </div>

     {!! Form::submit('find' , ['class' => 'btn btn-success']) !!}

     {!! Form::close() !!}
<h4>name of girls</h4>
     <ul id="girlsResult">

     </ul>

 </div>

 @endsection


         {{--
           ajax:{
               url:'api/searchCity',
               type:'POST',
               dataType:'json',
               delay:250,
               data:function(params){
                   console.log(params.term);
                   return{
                        locationVal:params.term
                    };
               },
               processResults:function(data){
                   console.log(results);
                    return{
                      results:$.map(data.items,function(val,i){
                          return{id:i , text:val};
                      })
                    };
               }
           }


         $('#locationSelect').on('select2:select' , function(e){
             var val = $('#locationSelect').val();
             //var cityVal = $('#cityLocation').val();
             $.post('/api/getLocationCoords' , {val:val} , function (match) {
                 myLatLng = new google.maps.LatLng(match[0],match[1]);
                 createMap(myLatLng);
                 searchGirls(match[0] , match[1]);
             });
         });

     });

  --}}









