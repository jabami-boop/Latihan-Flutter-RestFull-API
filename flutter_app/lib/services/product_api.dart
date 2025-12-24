import 'dart:convert';

import 'package:http/http.dart' as http;

import '../models/product.dart';

class ProductApi {
  ProductApi({required this.baseUrl});

  final String baseUrl;

  Uri _uri(String path) => Uri.parse('$baseUrl$path');

  Future<List<Product>> listProducts() async {
    final res = await http.get(_uri('/api/products'));
    if (res.statusCode != 200) {
      throw Exception(
        'Failed to load products (${res.statusCode}): ${res.body}',
      );
    }

    final decoded = jsonDecode(res.body) as Map<String, dynamic>;
    final rawItems = (decoded['data'] as List).cast<dynamic>();
    return rawItems.cast<Map<String, dynamic>>().map(Product.fromJson).toList();
  }

  Future<Product> createProduct({
    required String name,
    required double price,
    required int stock,
  }) async {
    final res = await http.post(
      _uri('/api/products'),
      headers: {'Content-Type': 'application/json'},
      body: jsonEncode({'name': name, 'price': price, 'stock': stock}),
    );

    if (res.statusCode != 201) {
      throw Exception(
        'Failed to create product (${res.statusCode}): ${res.body}',
      );
    }

    final decoded = jsonDecode(res.body) as Map<String, dynamic>;
    return Product.fromJson(decoded['data'] as Map<String, dynamic>);
  }

  Future<void> deleteProduct(int id) async {
    final res = await http.delete(_uri('/api/products/$id'));
    if (res.statusCode != 200 && res.statusCode != 204) {
      throw Exception(
        'Failed to delete product (${res.statusCode}): ${res.body}',
      );
    }
  }
}
