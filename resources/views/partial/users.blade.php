<div class="element-box">


    <div class="table-responsive">
        <table width="100%" class="table table-rm-style table-striped table-lightfont">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Income</th>
                    <th>DOB</th>
                    <th>Manglik</th>
                    <th>Family Type</th>
                    <th>Match</th>
                </tr>
            </thead>
            <tfoot>
                <tr>

                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Income</th>
                    <th>DOB</th>
                    <th>Manglik</th>
                    <th>Family Type</th>
                    <th>Match</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($users as $u)

                @php
                $match = 0;
                if(!empty($occupationsearch) && !empty($u->occupation) &&  strpos($occupationsearch, $u->occupation) !== false )
                {
                    $match = $match + 25;
                }
                 if(!empty($familytypesearch) && !empty($u->familytype) && strpos($familytypesearch, $u->familytype) !== false )
                {
                    $match = $match + 25;
                }
                if(!empty($mangliksearch) && !empty($u->manglik) && strpos($mangliksearch, $u->manglik) !== false )
                {
                    $match = $match + 25;
                }
                if(!empty($u->annualincome) && !empty($start) && !empty($finish) &&($u->annualincome >= $start || $u->annualincome<= $finish) )
                {
                    $match = $match + 25;
                }


                @endphp



                <tr>


                    <td>
                        <div>

                            <span>{{$u->first_name}}</span>
                        </div>

                    </td>

                    <td>
                        <div>

                            <span>
                                {{ $u->last_name}}
                            </span>
                        </div>

                    </td>

                    <td>
                        <div>

                            <span>
                                {{ $u->annualincome}}
                            </span>
                        </div>

                    </td>








                    <td>

                        <span>{{date('M d, Y',strtotime($u->dob))}}</span>

                    </td>




                    <td>{{$u->manglik}}</td>


                    <td>


                        {{$u->familytype}}





                    </td>

                    <td>


                        {{$match}}%





                    </td>


                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $users->links('partial.users_pagination') }}
