import PhotoSwipeLightbox from '../../lib/photoswipe/photoswipe-lightbox.esm.js';

const lightbox = new PhotoSwipeLightbox({
    gallery: '#gallery-grid',
    children: 'a',
    pswpModule: () => import('../../lib/photoswipe/photoswipe.esm.js')
});

lightbox.init();
