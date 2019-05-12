
var ListType = {
    WEEKLY: "weekly",
    RECOMM: "recomm",
    NEWS: "news",
};


function list_title() {
    let pathname = window.location.pathname;
    var kk = pathname.split("/").pop();
    var arr = kk.split(".");
    var type = arr[0];
    var dd = arr[1];
    if (type === ListType.WEEKLY) {
        return "本周热门";
    } else if (type === ListType.RECOMM) {
        return "主编力荐";
    } else if (type === ListType.NEWS) {
        return "本周新书";
    }
}