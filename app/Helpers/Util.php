<?php

namespace App\Helpers;

class Util
{
    /**
     * Function : Get Tipo Disputa Processo Array
     * @param mixed $string
     * @return array
     */
    public static function tipoDisputaProcesso()
    {
        $data = [
            "MENOR_LANCE" => "MENOR LANCE",
            "MAIOR_DESCONTO" => "MAIOR DESCONTO",
            "MAIOR_LANCE" => "MAIOR LANCE",
        ];
        return $data;
    }

    /**
     * Function : Get Modalidade Processo Array
     * @param mixed $string
     * @return array
     */
    public static function modalidadeProcesso()
    {
        $data = [
            "PREGAO_ELETRONICO" => "PREGÃO ELETRÔNICO",
            "DISPENSA_ELETRONICA" => "DISPENSA ELETRÔNICA",
            "RECEPCAO_PROPOSTAS" => "RECEPÇÃO DE PROPOSTAS",
            "CONCORRENCIA_ELETRONICA" => "CONCORRÊNCIA ELETRÔNICA",
            "LEILAO ELETRONICO" => "LEILÃO ELETRÔNICO",
            "SELECAO_SESI_SENAI" => "SELEÇÃO SESI/SENAI",
            "LICITACAO_13303" => "LICITAÇÃO 13.303",
        ];
        return $data;
    }

    /**
     * Function : Get Situação Processo Array
     * @param mixed $string
     * @return array
     */
    public static function situacaoProcesso()
    {
        $data = [
            "GRAVADO" => "GRAVADO",
            "PUBLICADO" => "PUBLICADO",
            "RECEPCAO_PROPOSTAS" => "RECEPÇÃO DE PROPOSTAS",
            "DESERTO" => "DESERTO",
            "ANALISE_PROPOSTAS" => "ANÁLISE DE PROPOSTAS",
            "DISPUTA" => "DISPUTA",
            "HABILITACAO" => "HABILITAÇÃO",
            "ADJUDICADO" => "ADJUDICADO",
            "HOMOLOGADO" => "HOMOLOGADO",
            "CANCELADO" => "CANCELADO",
            "FRACASSADO" => "FRACASSADO",
            "SUSPENSO" => "SUSPENSO",
            "REVOGADO" => "REVOGADO",
            "ANULADO" => "ANULADO",
            "EM RETIFICACAO" => "EM RETIFICAÇÃO",
            "JULGAMENTO" => "JULGAMENTO",
            "RESULTADO_FINAL" => "RESULTADO FINAL",
        ];
        return $data;
    }

    /**
     * Function : Get Name from Unidades Federativas Brazil Array
     * @param mixed $string
     * @return array
     */
    public static function UFs()
    {
        $estados = [
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espirito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MS' => 'Mato Grosso do Sul',
            'MT' => 'Mato Grosso',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins',
        ];
        return $estados;
    }
}
