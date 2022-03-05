<div id="users-table" class="table-responsive bg-white shadow rounded">
    <table class="display table mb-0 table-center" style="width:100%">
        <thead>
            <tr>
                <th>Serial</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>NID</th>
                <th>Status</th>
                <th>Volunteer</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @php $serial = $users->firstItem() - 1 @endphp
            @foreach($users as $user)
            @php
                $uExtra = $user->userExtra;
                $cAddr = $user->currentAddress();
                $pAddr = $user->permanentAddress();
            @endphp
            <tr>
                @php $serial++ @endphp
                <td>{{$serial}}</td>
                <td>{{$user->name}}</td>
                <td>{{$uExtra? ($uExtra->phone? $uExtra->phone : '') : ''}}</td>
                <td>{{$user->email? $user->email : ''}}</td>
                <td>{{$uExtra? ($uExtra->nid? $uExtra->nid : '') : ''}}</td>
                @switch($user->active_status)
                    @case(0)
                        <td> Pending </td>
                        @break
                    @case(1)
                        <td> Active </td>
                        @break
                    @case(2)
                        <td> Malicous</td>
                        @break
                    @case(3)
                        <td> Blocked </td>
                        @break
                    @case(4)
                        <td> Left </td>
                        @break
                    @case(5)
                        <td> Paused </td>
                        @break
                    @default
                        'Can\'t Define'
                @endswitch
                @switch($user->is_volunteer)
                    @case(0)
                        <td> Not </td>
                        @break
                    @case(1)
                        <td> Requested </td>
                        @break
                    @case(2)
                        <td> Volunteer </td>
                        @break
                    @case(3)
                        <td> Removed </td>
                        @break
                    @case(4)
                        <td> Resigned </td>
                        @break
                    @default
                        'Can\'t Define'
                @endswitch
                <td>
                    <a href="{{route('user.show', ['id' => $user->id, 'user_panel_fraction' => Request::segment(4)])}}">View</a>
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
            </tr>
        </tfoot>
    </table>
</div>