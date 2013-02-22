
Cards = new Meteor.Collection("cards");

if (Meteor.isClient) {
  Template.main.welcome = function () {
    return "IT Sabotage [ METEORJS PROTOTYPE ]";
  };

  Template.main.status = function () {
    return Meteor.status().connected;  
  };

  Template.main.cards = function () {
    return Cards.find();
  };

  Template.main.selected_name = function () {
    var card = Cards.findOne(Session.get("selected_card"));
    return card && card.name;
  };

  Template.main.selected = function () {
    return Session.equals("selected_card", this._id) ? "selected" : '';
  };

  Template.main.events = {
    'mousedown': setSelectedCard,
    'mouseup' : updateSelectedCard
  };
}

if (Meteor.isServer) {
  Meteor.startup(function () {
    Cards.remove({});

    if (Cards.find().count() === 0) {
      var names = ["1a",
                   "1b",
                   "1c",
                   "2a",
                   "2b",
                   "2c"];
      for (var i = 0; i < names.length; i++) {
            Cards.insert({
                name:   names[i],
                top:    Math.floor(Math.random()*10 + Math.random()*70)*i,
                left:   Math.floor(Math.random()*10 + Math.random()*70)*i
            });
        }
    }
  });
}

function setSelectedCard(e) {
  var id = $(e.target).parent().attr('id');
  var name = $(e.target).parent().attr('data-name');
  var top = $(e.target).parent().offset().top;
  var left = $(e.target).parent().offset().left;

  Session.set("selected_card", name);

  // template data, if any, is available in 'this'      
  if (typeof console !== 'undefined')
    console.log("setSelectedCard: ", name, id, top, left /*, coords */);
}


function updateSelectedCard(e) {
  var name = Session.get("selected_card");
  var top = $(e.target).parent().offset().top;
  var left = $(e.target).parent().offset().left;

  // template data, if any, is available in 'this'      
  if (typeof console !== 'undefined')
    console.log("updateSelectedCard: ", name, top, left);

  Cards.update({ 
    name: name
  }, {
    $set: { 
      top: top,
      left: left
  }});

}

