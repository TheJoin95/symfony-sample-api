import React from 'react';
import './welcome.css';

const Welcome = () => (
    <div className="welcome">
        <header className="welcome__top">
        </header>
        <section className="welcome__main">
            <div className="main__content">
                <h1>
                   Product & Category List
                </h1>
                <div className="main__other">
                    <div className="other__bloc">
                        <a href="">Product list</a>
                    </div>
                    <div className="other__bloc">
                        <a href="">Category list</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
);

export default Welcome;