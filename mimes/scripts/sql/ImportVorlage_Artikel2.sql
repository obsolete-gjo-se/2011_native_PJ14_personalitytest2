USE GSMAND2

UPDATE ARTIKEL
SET ARTNR = A1_ImportArtikel.ARTNR,
    MATCH = A1_ImportArtikel.MATCH,
    PEINHEIT = A1_ImportArtikel.PEINHEIT,
    LEINHEIT = A1_ImportArtikel.LEINHEIT,
    ZEINHEIT = A1_ImportArtikel.ZEINHEIT,
    VEINHEIT = A1_ImportArtikel.VEINHEIT,
    EINHEIT = A1_ImportArtikel.EINHEIT,
    GEWICHT = A1_ImportArtikel.GEWICHT,
    EKPR01 = A1_ImportArtikel.EKPR01,
    EKPR02 = A1_ImportArtikel.EKPR02,
    EKPR03 = A1_ImportArtikel.EKPR03,
    ZUSTEXT1 = A1_ImportArtikel.ZUSTEXT1,
    WG = A1_ImportArtikel.WG,
    BESTNR = A1_ImportArtikel.BESTNR,
    FLD01 = A1_ImportArtikel.FLD01,
    FLD02 = A1_ImportArtikel.FLD02,
    FLD03 = A1_ImportArtikel.FLD03,
    PASSIV = A1_ImportArtikel.PASSIV,
    PRBRUTTO = 1
    
FROM A1_ImportArtikel
WHERE ARTIKEL.ARTNR = A1_ImportArtikel.ARTNR

UPDATE VKPREIS
SET PR01 = A1_ImportArtikel.PR01,
    PR02 = A1_ImportArtikel.PR02,
    PR03 = A1_ImportArtikel.PR03,
    PR04 = A1_ImportArtikel.PR04,
    PR05 = A1_ImportArtikel.PR05,
    ART02 = 0,
    ART03 = 0,
    ART04 = 0,
    ART05 = 0,
    DB02 = 0,
    DB03 = 0,
    DB04 = 0,
    DB05 = 0
FROM A1_ImportArtikel JOIN ARTIKEL ON A1_ImportArtikel.ARTNR = ARTIKEL.ARTNR
WHERE  VKPREIS.ARTINR = ARTIKEL.NUMMER
