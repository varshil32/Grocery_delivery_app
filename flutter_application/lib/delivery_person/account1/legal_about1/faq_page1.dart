import 'package:url_launcher/url_launcher.dart';

import 'app_properties1.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class FaqPage1 extends StatefulWidget {
  @override
  _FaqPage1State createState() => _FaqPage1State();
}

class _FaqPage1State extends State<FaqPage1> {
  List<Panel> panels = [
    Panel(
        'What are the delivery areas covered by our service?',
        "FamieCare's delivery service covers a range of areas within the city. You can check the delivery coverage map in the app or contact support for further information.",
        false),
    Panel(
        'How should I handle a situation where the customer is not available to receive their delivery?',
        'If the customer is not available to receive their delivery, you should attempt to contact them via phone or text to reschedule the delivery. If multiple attempts to contact the customer are unsuccessful, you should return the package to the warehouse.',
        false),
    Panel(
        'What should I do if I am unable to find the delivery location or if there is an issue with the address?',
        'If you are unable to find the delivery location or if there is an issue with the address, you should attempt to contact the customer for clarification. If the issue persists, you should contact support for further instructions',
        false),
    Panel(
        'How should I handle a situation where a customer reports a missing item from their order?',
        'If a customer reports a missing item from their order, you should review the order details and contact support to investigate the issue. It is important to communicate with the customer throughout the process and provide updates on the resolution.',
        false),
    Panel(
        'What is the procedure for returning a package to the warehouse?',
        'The procedure for returning a package to the warehouse varies depending on the reason for the return. You should follow the instructions provided in the app or contact support for further guidance.',
        false),
    Panel(
        'What should I do if there is a problem with the delivery vehicle or equipment?',
        'If there is a problem with the delivery vehicle or equipment, you should contact support immediately for instructions on how to proceed.',
        false)
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        iconTheme: IconThemeData(
          color: Colors.black,
        ),
        brightness: Brightness.light,
        backgroundColor: Colors.transparent,
        // title: Text(
        //   'Settings',
        //   style: TextStyle(color: darkGrey),
        // ),
        elevation: 0,
      ),
      body: SafeArea(
        bottom: true,
        child: Padding(
          padding: const EdgeInsets.only(top: 24.0),
          child: ListView(
            children: <Widget>[
              Padding(
                padding: const EdgeInsets.only(
                    left: 24.0, right: 24.0, bottom: 16.0),
                child: Text(
                  'FAQ',
                  style: TextStyle(
                      color: Colors.black,
                      fontWeight: FontWeight.bold,
                      fontSize: 18.0),
                ),
              ),
              ...panels
                  .map((panel) => ExpansionTile(
                          title: Text(
                            panel.title,
                            style: TextStyle(
                                fontSize: 14,
                                fontWeight: FontWeight.bold,
                                color: Colors.grey[900]),
                          ),
                          children: [
                            Container(
                                padding: EdgeInsets.all(16.0),
                                color: Color.fromARGB(255, 213, 248, 195),
                                child: Text(panel.content,
                                    style: TextStyle(
                                        color: Colors.grey, fontSize: 12)))
                          ]))
                  .toList(),
              Padding(
                padding: const EdgeInsets.only(
                    top: 24.0, left: 24.0, right: 24.0, bottom: 20.0),
                child: Text(
                  'Contact Us',
                  style: TextStyle(
                      color: Colors.black,
                      fontWeight: FontWeight.bold,
                      fontSize: 18.0),
                ),
              ),
              Padding(
                  padding: const EdgeInsets.only(left: 35.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      GestureDetector(
                        child: Text(
                          '+91 9265446175',
                          style: TextStyle(
                              fontSize: 14,
                              fontWeight: FontWeight.bold,
                              color: Colors.grey[600]),
                        ),
                        onTap: () => launch('tel:+91 9265446175'),
                      ),
                      GestureDetector(
                        child: Text(
                          '\n+91 9664699320',
                          style: TextStyle(
                              fontSize: 14,
                              fontWeight: FontWeight.bold,
                              color: Colors.grey[600]),
                        ),
                        onTap: () => launch('tel:\n+91 9664699320'),
                      ),
                    ],
                  ),
                ),
              Padding(
                padding: const EdgeInsets.only(
                    top: 24.0, left: 24.0, right: 24.0, bottom: 16.0),
                child: Text(
                  'Email:',
                  style: TextStyle(
                      color: Colors.black87,
                      fontWeight: FontWeight.bold,
                      fontSize: 15.0),
                ),
              ),
              Padding(
                  padding: const EdgeInsets.only(left: 35.0),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      GestureDetector(
                        child: Text(
                          'shethaman2@gmail.com',
                          style: TextStyle(
                              fontSize: 14,
                              fontWeight: FontWeight.bold,
                              color: Colors.grey[600]),
                        ),
                        onTap: () => launch('mailto:\nshethaman2@gmail.com'),
                      ),
                        GestureDetector(
                        child: Text(
                          '\nvarshilshah1945@gmail.com',
                          style: TextStyle(
                              fontSize: 14,
                              fontWeight: FontWeight.bold,
                              color: Colors.grey[600]),
                        ),
                        onTap: () => launch('mailto:\nvarshilshah1945@gmail.com'),
                      ),
                    ],
                  ),
                ),
            ],
          ),
        ),
      ),
    );
  }
}

class Panel {
  String title;
  String content;
  bool expanded;

  Panel(this.title, this.content, this.expanded);
}
