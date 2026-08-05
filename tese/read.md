Estou organizando os notebooks que utilizo para análise de dados. Vou criar uma pasta chamada notebooks. 

Notebooks:
1) Notebook para extração de informações sobre mortalidade relacionadas a dengue. Nesse caso estou usando como fonte o SIM (sistema de informações sobre mortalidades).
O código relacionados à mortalidade da dengue é A90 (dengue clássica) e A91 (dengue hemorrágica).
2) Foi realizada um filtro selecionando 16 colunas (de um total de 87 colunas). Seguem as colunas utilizadas:
+ **Características do óbito**
Descrevem o próprio evento do óbito
"DTOBITO", Tipo do óbito (fetal, não fetal etc.).
"TIPOBITO", Local de ocorrência (hospital, domicílio, via pública, outros).

+ **Características demográficas**
Descrevem quem era o paciente.
"IDADE",
"SEXO",
"RACACOR",
    
+ **Localização geográfica**
Indicam onde a pessoa morava e onde ocorreu o óbito. Essas colunas serão particularmente importantes para integrar os dados do SIM com SINAN, SIH e IBGE.
"CODMUNRES",
"CODMUNOCOR",
"LOCOCOR",

+ **Estabelecimento de saúde**
Identificam a unidade onde o óbito foi registrado.
    "CODESTAB",
    "ESTABDESCR",
   
+ **Causas do óbito:**
    "CAUSABAS",
    "LINHAA",
    "LINHAB",
    "LINHAC",
    "LINHAD",
    "LINHAII"

Essas cerca de 16 colunas já permitem responder perguntas como:

+ Quantos óbitos por dengue ocorreram em determinado município?
+ Qual a distribuição por sexo e faixa etária?
+ Onde ocorreram os óbitos (hospital, domicílio etc.)?
+ **Quais causas aparecem associadas à dengue?**
+ Quais municípios apresentaram maior mortalidade?

## Quais causas aparecem associadas à dengue?

Essa é justamente a parte mais rica do SIM.

Imagine uma declaração de óbito:
LINHAA
Insuficiência respiratória

LINHAB
Choque hipovolêmico

LINHAC
Dengue grave

LINHAD
Infecção pelo vírus da dengue

LINHAII
Diabetes mellitus

Neste caso:

causa básica = dengue
causas associadas =
insuficiência respiratória
choque
diabetes

Isso é extremamente interessante para estudos epidemiológicos.
