DELETE FROM tblAuction
WHERE	  tblAuction.completed_data = 1 and
		  tblAuction.sell_success = 0;