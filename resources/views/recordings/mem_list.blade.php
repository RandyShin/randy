<!DOCTYPE html>

<meta charset="utf-8" />
<meta content="initial-scale=1.0; width=device-width, maximum-scale=1.0; minimum-scale=1.0; user-scalable=no;" name="viewport" />


<link href='bootstrap.min.css' rel='stylesheet' />
<head>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
    <title>ZioTes Recording Server</title>


    <link href="three.css" rel='stylesheet'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $("#playhide").hide(1000);
                var i = 0;
                var playbackId = "CURRENT_MSG";
                var cmTable = document.getElementById('b_table');
                // Only one playback row is allowed to be open at a time.
                // If one is already open, close it.
                for (i = 0; i < cmTable.rows.length; i++) {
                    if (cmTable.rows[i].id == playbackId) {
                        // Delete the row; it's a Playback control row.
                        cmTable.deleteRow(cmTable.rows[i].rowIndex);
                    }
                }
            });


        });
    </script>

    <style>
        <style>
        <!--
        td { font-size : 9pt; }
        A:link { font : 9pt; color : black; text-decoration : none; font-family : 굴림; font-size : 9pt; }
        A:visited { text-decoration : none; color : black; font-size : 9pt; }
        A:hover { text-decoration : underline; color : black; font-size : 9pt; }

        -->
    </style>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">

    <!-- Close Music-->
    <script>
        $('#deleteto').click(function(e){
            $(this).closest('tr').remove()
        })
    </script>

    <style>
        .ui-datepicker{ font-size: 10px; width: 160px; }
        .ui-datepicker select.ui-datepicker-month{ width:30%; font-size: 11px; }
        .ui-datepicker select.ui-datepicker-year{ width:40%; font-size: 11px; }
        }
    </style>

    <script>
        function play2(file, dst) {
            newwindow=window.open('convert_file_play.php?sdownloadlink=' + file + '&phone=' + dst ,'player','height=80,width=550,left=800,top=200');
            if (window.focus) {newwindow.focus()}
            return false;
        }
    </script>

</head>

<div class="row">
    <div class="col-md-12">

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No.</th>
                <th>수업번호</th>
                <th>시작시간</th>
                <th>수업분</th>
                <th>듣기</th>
            </tr>
            </thead>



@php
 $no = '0';
@endphp


            <tdody>
                @forelse($cdrs as $cdr)

                    @php
                        $file_date = explode('-',substr($cdr->calldate,0,10));
                        $file_source = $file_date[0]."/".$file_date[1]."/".$file_date[2]."/".$cdr->recordingfile;

                        $no ++ ;
                    @endphp



                    <tr>
                        <th>{{ $no }}</th>
                        <th>{{ $cdr->dst }}</th>
                        <th>{{ substr(($cdr->calldate), 10, 9) }}</th>
                        <th>{{ gmdate("i:s", $cdr->duration) }}</th>
                        <th align="center" ><input type="button" class="btn btn-default btn-sm" value="듣기" onclick="window.open('/recording/listen?file_source={{$file_source}}&rec_server={{$rec70}}', '팝업창 이름', 'width=300, height=300')"></th>

                    </tr>
                @empty
                    <p class="center">자료가 없습니다.</p>
                @endforelse
            </tdody>


        </table>


