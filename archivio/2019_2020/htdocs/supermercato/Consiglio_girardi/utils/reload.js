var time = new Date().getTime()
function refresh() {
  if (new Date().getTime() - time >= 10000) window.location.reload(true)
  else setTimeout(refresh, 10000)
}

setTimeout(refresh, 10000)
