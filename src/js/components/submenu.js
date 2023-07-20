function ContainsClickListener(element, callback) {
  function detectClickLocation(event){
      if (element.contains(event.target)) {
        callback(true);
      }else{
        callback(false);
      }
  }

  function start(){
    document.addEventListener('click', detectClickLocation);
  }

  function stop(){
    document.removeEventListener('click', detectClickLocation);
  }

  return {
    start : start,
    stop  : stop
  }
}

function Timer(milliseconds = 1000){
  let time = milliseconds,
      clock = null;


  this.setTime = function(milliseconds){
    time = milliseconds;
  }

  this.start = function(callback){
    clock = setTimeout(callback, time);
  }

  this.stop = function(){
    if(clock){
      clearTimeout(clock);
    }
  }
}





function Submenu(element){
  const group = element,
        toggleBtn = group.querySelector('button'),
        focusableEls = group.querySelectorAll('a[href]:not([disabled]), button:not([disabled])'),
        timer = new Timer(150),
        clickListener = new ContainsClickListener(group, onClick)
  
  if( toggleBtn ){
    addEventHandlers();
  }

  function addEventHandlers()
  {
    toggleBtn.addEventListener("click", onToggleSubmenu);

    for(const elem of focusableEls){
      elem.addEventListener("blur", startClose);
      elem.addEventListener("focus", cancelClose);
    }
  }

  function onToggleSubmenu(){
    if(toggleBtn.getAttribute("aria-expanded") === "false"){
      open();
    }else{
      close();
    }
  }

  function open()
  {
    toggleBtn.setAttribute('aria-expanded', true);
    clickListener.start();
  }
  
  function close()
  {
    toggleBtn.setAttribute('aria-expanded', false);
    clickListener.stop();
  }

  function startClose()
  {
    timer.start(close);
  }

  function cancelClose()
  {
    timer.stop();
  }

  function onClick(containsClick){
    if(containsClick){
      cancelClose();
    }else{
      startClose();
    }
  }

}


function addSubmenuToggles(selector){
  var submenus = document.querySelectorAll(selector);
  if(submenus){
    Array.prototype.forEach.call(submenus, function(submenu){
      new Submenu(submenu);
    });
  }
}

addSubmenuToggles('li.menu-item-has-children');