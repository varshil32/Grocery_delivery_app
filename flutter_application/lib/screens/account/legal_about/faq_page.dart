  import 'app_properties.dart';
  import 'package:flutter/cupertino.dart';
  import 'package:url_launcher/url_launcher.dart';
  import 'package:flutter/material.dart';

  class FaqPage extends StatefulWidget {
    @override
    _FaqPageState createState() => _FaqPageState();
  }

  class _FaqPageState extends State<FaqPage> {
    List<Panel> panels = [
      Panel(
          'How do I place an order on Famiecare dairy and grocery application?',
          'To place an order on Famiecare dairy and grocery application, you need to create an account or log in if you already have one. Once logged in, you can browse through the products available for purchase, select the items you want to buy, add them to your cart, and proceed to checkout.',
          false),
      Panel(
          'What payment methods are accepted on Famiecare dairy and grocery application?',
          'Famiecare dairy and grocery application accepts cash on delivery for now on.Other payment methods will be added soon',
          false),
      Panel(
          'How can I track my order on Famiecare dairy and grocery application?',
          'You can track your order on Famiecare dairy and grocery application by checking the real-time updates on the status of your delivery. This includes notifications about when the products are being packed, when they are out for delivery, and when they have been delivered.',
          false),
      Panel(
          'Does Famiecare dairy and grocery application offer same-day delivery?',
          'Yes, Famiecare dairy and grocery application offers same-day delivery for orders placed before a specified cut-off time.',
          false),
      Panel(
          'Does Famiecare dairy and grocery application offer discounts or promotions?',
          'Yes, Famiecare dairy and grocery application offers discounts and promotions from time to time. Customers can check the app or sign up for the newsletter to stay updated on the latest offers.',
          false),
      Panel(
          'What if I receive a damaged or incorrect product from Famiecare dairy and grocery application?',
          'If you receive a damaged or incorrect product from Famiecare dairy and grocery application, you can contact their customer support team within a specified timeframe and they will initiate a return or refund process for you.',
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
                  padding: const EdgeInsets.only(
                      left: 24.0, right: 24.0, bottom: 16.0),
                  child: Text(
                    'Mobile Number:',
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
