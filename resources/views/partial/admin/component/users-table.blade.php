<div id="users-table-area" class="table-responsive bg-white shadow rounded">
    <table id="users-table" class="display table mb-0 table-center" style="width:100%">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Role</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Facebook</th>
                <th>Address</th>
                <th>NID</th>
                <th>Is Active</th>
                <th>Is Volunteer</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @php $serial = 0 @endphp
            @foreach($users as $user)
            <tr>
                @php $serial++ @endphp
                <td>{{$serial}}</td>
                <td>{{$user->name}}</td>
                <td>
                    @foreach($user->roles as $role)
                        {{$role->name}}, 
                    @endforeach
                </td>
                <td>{{$user->address->phone}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->facebook}}</td>
                <td>{{$user->address->toString()}}</td>
                <td>{{$user->address->nid}}</td>
                @switch($user->active_status)
                    @case(0)
                        <td>{{'Pending'}}</td>
                        @break
                    @case(1)
                        <td>{{'Active'}}</td>
                        @break
                    @case(2)
                        <td>{{'Malicous'}}</td>
                        @break
                    @case(3)
                        <td>{{'Blocked'}}</td>
                        @break
                    @case(4)
                        <td>{{'Left'}}</td>
                        @break
                    @default
                        'Can\'t Define'
                @endswitch
                @switch($user->is_volunteer)
                    @case(0)
                        <td>{{'Not'}}</td>
                        @break
                    @case(1)
                        <td>{{'Requested'}}</td>
                        @break
                    @case(2)
                        <td>{{'Volunteer'}}</td>
                        @break
                    @case(3)
                        <td>{{'Removed'}}</td>
                        @break
                    @case(4)
                        <td>{{'Resigned'}}</td>
                        @break
                    @default
                        'Can\'t Define'
                @endswitch
                <td>
                    <a href="javascript:void(0)">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>