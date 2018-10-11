/** --------------------------------------------------------
*
*  @file index - dissan.com
*  @copyright 2018
*  @author penholder designerd
*  @version 1.0
*
*/
//--------------------------------------------------------
// modules
import parallax from './modules/parallax';
// core styles
import 'sanitize.css';
import 'materialize-css';
import M from 'materialize-css';
import '../styles/index.scss';
//--------------------------------------------------------
//>>     DOM READY
/**
 * @param {Function} callback - function to call after DOM is ready
 */
//--------------------------------------------------------
const domReady = callback => {
   document.readyState === 'interactive' || document.readyState === 'complete'
      ? callback()
      : document.addEventListener('DOMContentLoaded', callback);
};
/**
 * @callback Dissan - callback function of deomReady()
 */
const Dissan = () => {

   console.log('init');
   console.log(JSON.stringify(theme, null, 2));

   const parallaxImg = document.querySelector('.parallax img');

   parallaxImg && parallax(parallaxImg);

   M.AutoInit();
};

domReady(Dissan);
//--------------------------------------------------------