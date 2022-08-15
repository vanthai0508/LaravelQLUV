<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/listcv.css')}}">
</head>
<h2>DANH SÁCH CÁC CV</h2>
<div class="table-wrapper">
    <table class="fl-table">

        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Vị trí</th>
                <th>Ngày apply</th>
                <th>Phone</th>
                <th>Link CV</th>
                <th>Id User</th>
                <th>Reject or approve</th>
            </tr>
        </thead>
        <tbody>
            <?php
           // $stt=1;
         //   for($i=1;$i<=sizeof($CVS);$i++){ 
            ?>
            @foreach($cvs as $key => $cv)
            <tr>
                <td> {{ $key+1 }}</td>
                <td> {{ $cv->name}}</td>
                <td> {{ $cv->position}} </td>
                <td> {{ $cv->dateapply }}</td>
                <td> {{ $cv->phone }}</td>
                <!-- <td><img src="Model\uploads\{{ $cv->file}}"></td> -->
                <td></td>
                
                <!-- <td>
                    <a href="index.php?Controller=cv&Action=reject&idcv=" class="button">Reject</a>
                    <a href="index.php?Controller=cv&Action=approve&idcv=" class="button">Approve</a>
                </td> -->

            </tr>
            <?php
         //   $stt++;
            
        ?>



            @endforeach
        </tbody>
    </table>
</div>