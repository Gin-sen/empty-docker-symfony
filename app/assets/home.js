import "./styles/home.scss";
import "jquery/dist/jquery.slim.min";

$('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
})
