import PhotoSwipeLightbox from '../../node_modules/photoswipe/dist/photoswipe-lightbox.esm.js';

const lightbox = new PhotoSwipeLightbox({
    gallery: '#gallery-grid',
    children: 'a',
    pswpModule: () => import('../../node_modules/photoswipe/dist/photoswipe.esm.js')
});

lightbox.init();
