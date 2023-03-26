import React from "react";
import "./styles.css";
import Message from "./Messages/Message";

const AllMessages = (props) => {
  return (
    <div className="inbox">
      <div className="message from">Hii</div>
      <div className="message from">El hamdella</div>
      <div className="message from">W enta?</div>
      <Message messages={props.messages} />
    </div>
  );
};

export default AllMessages;
