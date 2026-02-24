document.addEventListener('DOMContentLoaded', () => {
    
    // accordion toggle for membership cards
    const setupAccordion = (headerId, bodyId) => {
        const header = document.getElementById(headerId);
        const body = document.getElementById(bodyId);
        
        if (!header || !body) return; // fail silently if missing
        
        const icon = header.querySelector('.chevron-icon');
        
        header.addEventListener('click', () => {
            body.classList.toggle('active');
            
            // spin the arrow
            if (icon) icon.classList.toggle('rotate');
        });
    };

    // init cards
    setupAccordion('header-foundation', 'body-foundation');
    setupAccordion('header-economy', 'body-economy');
    
});