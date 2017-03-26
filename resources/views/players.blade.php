@extends("layouts.game")
@section('site_head')
Players
@endsection
@section("mainarea")
    <?php use App\User;
    use App\Player;?>
    <hr>
    <div class="main-box no-header clearfix">
        <div class="main-box-body clearfix">
            <div class="table-responsive">
                <table style="width: 60% !important; margin-left: 20% !important;" class="table user-list">
                    <thead>
                    <tr>
                        <th style="text-align: center;"><span>Rank</span></th>
                        <th style="text-align: center;"><span>Username</span></th>
                        <th style="text-align: center;"><span>Cities</span></th>
                        <th style="text-align: center;"><span>Member since</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($users as $user)
                        <tr>
                            <td style="text-align: center;">{{$i}}</td>
                            <?php $i = $i + 1;?>
                            <td style="text-align: center;">
                                <a href="#" class="user-link">{{$user->name}}</a>
                            </td>
                            <td style="text-align: center;">
                                <span class="label label-default"><?php echo count(["a", "b"]);?></span>

                            </td>
                            <td style="text-align: center;">{{$user->created_at}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection