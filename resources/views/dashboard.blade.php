@section('content')
@extends('layouts.app_layout')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <a href="/pagelogout">Logout</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    User Lists
                    <div id="usertable">


                    </div>
                </div>


            </div>


        </div>
    </div>


</x-app-layout>

@endsection


@section('scripts')

<script>
    getuserdata(1);

function getuserdata(page) {
$.get('/getuserdata?page=' + page, function (
  data) {
  $('#usertable').html('');
  $('#usertable').html(data);

  var cntrows = $('#usertable tr').length - 1;
  $('#numberofbox').text((cntrows - 1));
  $('a').tooltip();

  $(document).on('click', '.pagination a', function (e) {
    debugger;
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    getuserdata(page);
  });

})
}

</script>



@endsection



