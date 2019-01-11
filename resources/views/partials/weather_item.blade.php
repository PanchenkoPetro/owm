<div class="white-box">
<tr>
    <td>
        <img src="http://openweathermap.org/img/w/{{{ $res->weather[0]->icon }}}.png">
    </td>
    <td>
        <b>
            <a href="http://openweathermap.org//city/{{{ $res->id }}}"> {{{ $res->name }}}, {{{ $res->sys->country }}}</a></b>
        <img src="http://openweathermap.org/images/flags/{{{ strtolower($res->sys->country) }}}.png"><b><i> {{{ $res->weather[0]->description }}}</i></b>
        <p><span class="badge badge-info">{{{ $res->main->temp }}}°С
            </span> temperature from {{{ $res->main->temp_min }}} to {{{ $res->main->temp_max }}} °С, wind {{{ $res->wind->speed }}} m/s. clouds {{{ $res->clouds->all }}} %, {{{ $res->main->pressure }}} hpa</p>
        </p>
    </td>
</tr>
</div>