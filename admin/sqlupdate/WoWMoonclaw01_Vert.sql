#MoonV
DELETE FROM eqdkp_styles where style_id=31;
DELETE FROM eqdkp_style_config where style_id=31;
INSERT INTO eqdkp_styles (style_id, style_name, template_path, body_background, body_link, body_link_style, body_hlink, body_hlink_style, header_link, header_link_style, header_hlink, header_hlink_style, tr_color1, tr_color2, th_color1, fontface1, fontface2, fontface3, fontsize1, fontsize2, fontsize3, fontcolor1, fontcolor2, fontcolor3, fontcolor_neg, fontcolor_pos, table_border_width, table_border_color, table_border_style, input_color, input_border_width, input_border_color, input_border_style) VALUES (31, 'WoWMoonclaw01_Vert', 'WoWMoonclaw01V', '000000', 'CBA300', 'none', 'E98219', 'underline', 'FFDD33', 'none', 'E98219', 'none', '454545', '202020', '020725', 'Verdana, Tahoma, Arial', 'Verdana, Tahoma, Arial', 'Verdana, Tahoma, Arial', 10, 11, 12, 'FFFFFF', '007799', 'FFFFFF', 'F80000', '008800', 0, '1', 'solid', '000000', 1, '202020', 'solid');
INSERT INTO eqdkp_style_config (style_id, attendees_columns, logo_path) VALUES (31, '8', 'bc_header3.gif');
