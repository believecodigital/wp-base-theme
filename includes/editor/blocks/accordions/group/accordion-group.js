
(function(){
    const accordionGroups = document.querySelectorAll('.accordion-group-block.autoclose-accordions');
    if(accordionGroups.length > 0){
        [...accordionGroups].forEach((group) => {
            const accordions = group.querySelectorAll('details');
            accordions.forEach((target) => {
                target.addEventListener('click', ()=> {
                    accordions.forEach((accordion) => {
                        if(accordion !== target){
                            accordion.removeAttribute('open');
                        }
                    })
                });
            })
        });
    }
})();