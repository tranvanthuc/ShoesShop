function getData(data)
{
  return JSON.parse(data).results;
}

function convertIntoJson(data) 
{
  return JSON.stringify(data)
}

function getParam(param) 
{
  var url_str = window.location.href;
  var url = new URL(url_str);
  return url.searchParams.get(param);
}

function getAPI()
{
  return 'https://calm-dawn-66282.herokuapp.com/';
  
}
