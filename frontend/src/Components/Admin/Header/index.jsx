import React from 'react';
import { FaBars } from 'react-icons/fa';
import "./style.css";

const Header = ({ toggle }) => {
    return (
        <header >
          <nav className='navbar'>
            <div className='nav-icon' onClick={toggle}>
              <FaBars />
            </div>
            <div ><h1>Admin Pannel</h1></div>
          </nav>
        </header>
    );
};
export default Header;