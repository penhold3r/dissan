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

// core styles
import 'sanitize.css';
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

   console.log('init')

};
//
domReady(Dissan);
//--------------------------------------------------------