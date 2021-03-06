SELECT    tblAuction.article_name,
		  tbluser.user_name,
		  SUM(tblAuction.quant_sold)AS Menge,
		  AVG(tblAuction.current_bid)AS Auctionspreis,
		  MIN(tblAuction.current_bid)AS MiniPreis,
		  MAX(tblAuction.current_bid)AS MaxiPreis,
		  AVG(tblAuction.buyitnow_price)AS Festpreis,
		  AVG(tblAuction.shipping_cost) AS Versandkosten,
		  (
CASE	  
  WHEN	  AVG(tblAuction.current_bid) = 0 THEN SUM((tblAuction.buyitnow_price+tblAuction.shipping_cost)*tblAuction.quant_sold)
  WHEN	  AVG(tblAuction.current_bid) > 0 THEN SUM((tblAuction.current_bid+tblAuction.shipping_cost)*tblAuction.quant_sold)
  WHEN	  AVG(tblAuction.current_bid) > 0 AND
		  AVG(tblauction.buyitnow_price) > 0 THEN SUM((tblAuction.current_bid+tblAuction.shipping_cost)*tblAuction.quant_sold)
END		  )AS Gesamtumsatz
FROM      tblAuction INNER JOIN tblUser ON tblAuction.seller_id = tblUser.id
WHERE	  tblAuction.article_name LIKE '%%' AND
		  tbluser.user_name Like '%%' AND
		  tblAuction.sell_success = 1 AND
		  (tblAuction.current_bid > 15.00 OR
		  tblAuction.buyitnow_price > 15.00)
GROUP BY  
HAVING	  SUM(tblAuction.quant_sold) > 20
ORDER BY  SUM(tblAuction.quant_sold)DESC;