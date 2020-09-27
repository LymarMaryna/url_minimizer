<div id="div-signin" class="form-signin">
    <h4><strong>Input your URL address:</strong></h4>
    <input id="input_url" type="url" class="form-control" placeholder="Input URL address"
           required autofocus>
    <input id="result_url" type="url" class="form-control hidden" autofocus>

    <div class="error">

    </div>
    <br>
    <label class="checkbox-inline"><input id="limit" type="checkbox" value=""><strong>Create a link
            with a limited shelf life</strong>
    </label>
    <br>
    <select class="form-control lifetime_select" style="margin-top: 15px;display:none">
        <option value="hour">1 hour</option>
        <option value="day">1 day</option>
        <option value="week">1 week</option>
        <option value="month">1 month</option>
        <option value="year">1 year</option>
    </select>
    <br>
    <div class="button_block">
        <button type="button" id="minimaze" class="btn btn-primary">Minimaze</button>

        <button type="button" id="copy" class="btn btn-success hidden">Copy</button>

        <button type="button" id="statistic" class="btn btn-warning">Show statistics</button>
    </div>
</div>
<form id="stat_form" class="hidden" method="post" action="/stat">
    <input type="hidden" disabled name="url" value=""/>
</form>


