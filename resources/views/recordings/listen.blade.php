

    @php
    $file_source = $_GET['file_source'];
    $rec_server = $_GET['rec_server'];

// if (preg_match("/(Trident\/(\d{2,}|7|8|9)(.*)rv:(\d{2,}))|(MSIE\ (\d{2,}|8|9)(.*)Tablet\ PC)|(Trident\/(\d{2,}|7|8|9))/", $_SERVER["HTTP_USER_AGENT"], $match) != 0) {
//     print 'You are using IE11 or above.';
// } else {
//     print 'you r not ie';
// }
    @endphp




    @if (preg_match("/(Trident\/(\d{2,}|7|8|9)(.*)rv:(\d{2,}))|(MSIE\ (\d{2,}|8|9)(.*)Tablet\ PC)|(Trident\/(\d{2,}|7|8|9))/", $_SERVER["HTTP_USER_AGENT"], $match) != 0)

        <OBJECT classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,5,715" type="application/x-oleobject" id="MediaPlayer" name="MediaPlayer" width="300" height="70">

            <PARAM name="Filename" value="http://{{$rec_server}}/monitor/{{$file_source }}">
            <param name="AllowScan" value="-1">
            <param name="AllowChangeDisplaySize" value="-1">
            <param name="AnimationAtStart" value="0">
            <param name="AudioStream" value="-1">
            <param name="AutoStart" value="-1">
            <param Name="AutoSize" Value="0">
            <param name="AutoResize" value="-1">
            <param name="AutoRewind" value="0">
            <param name="Balance" value="0">
            <param name="BaseURL">
            <param name="BufferingTime" value="10">
            <param name="CaptioningID">
            <param name="ClickToPlay" value="-1">
            <param name="CursorType" value="0">
            <param name="CurrentPosition" value="-1">
            <param name="CurrentMarker" value="0">
            <param name="DefaultFrame">
            <param name="DisplayBackColor" value="0">
            <param name="DisplayForeColor" value="16777215">
            <param name="DisplayMode" value="0">
            <param name="DisplaySize" value="0">
            <param name="Enabled" value="-1">
            <param name="EnableContextMenu" value="0">
            <param name="EnablePositionControls" value="-1">
            <param name="EnableFullScreenControls" value="-1">
            <param name="EnableTracker" value="-1">

    @else

        <audio controls="controls">
            <source src="http://175.117.145.70/monitor/{{$file_source }}" type="audio/ogg" />
            <source src="http://175.117.145.70/monitor/{{$file_source }}" type="audio/mpeg" />
            Your browser does not support the audio element.
        </audio>


@endif


